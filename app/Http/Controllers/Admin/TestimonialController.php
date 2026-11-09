<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateTestimonial($request);

        $data = $this->prepareData($validated, $request);

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Témoignage créé avec succès ✅');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $validated = $this->validateTestimonial($request);

        $data = $this->prepareData($validated, $request, $testimonial);

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Témoignage modifié avec succès ✅');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->author_avatar && Storage::disk('public')->exists($testimonial->author_avatar)) {
            Storage::disk('public')->delete($testimonial->author_avatar);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Témoignage supprimé avec succès ✅');
    }

    /**
     * ═══════════════════════════════════════════════
     * VALIDATION STRICTE + SÉCURISATION
     * ═══════════════════════════════════════════════
     */
    private function validateTestimonial(Request $request): array
    {
        return $request->validate([
            'author_name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                // Regex : lettres (accents inclus), espaces, tirets, apostrophes, points
                'regex:/^[A-Za-zÀ-ÿ\s\-\'\.]+$/u',
            ],
            'author_role' => 'nullable|string|max:100',
            'company'     => 'nullable|string|max:100',
            'quote'       => [
                'required',
                'string',
                'min:10',
                'max:500',
                // Interdit les balises HTML et les scripts
                function ($attribute, $value, $fail) {
                    if (preg_match('/<script|<iframe|javascript:|on\w+=/i', $value)) {
                        $fail('Le témoignage contient du contenu non autorisé.');
                    }
                },
            ],
            'rating'      => 'nullable|integer|min:1|max:5',
            'order'       => 'nullable|integer|min:0|max:999',
            'is_active'   => 'boolean',
            'author_avatar' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048', // 2 Mo max
                // Vérifier les dimensions minimales
                'dimensions:min_width=50,min_height=50,max_width=2000,max_height=20000',
            ],
        ], [
            'author_name.regex' => 'Le nom ne peut contenir que des lettres, espaces, tirets et apostrophes.',
            'quote.max'         => 'La citation ne doit pas dépasser 500 caractères.',
            'author_avatar.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'author_avatar.dimensions' => 'L\'image doit faire entre 50×50 et 2000×2000 pixels.',
        ]);
    }

    /**
     * Prépare les données avec sanitisation
     */
    private function prepareData(array $validated, Request $request, ?Testimonial $testimonial = null): array
    {
        $data = [
            'author_name' => $this->sanitize($validated['author_name']),
            'author_role' => $this->sanitize($validated['author_role'] ?? null),
            'company'     => $this->sanitize($validated['company'] ?? null),
            'quote'       => $this->sanitize($validated['quote']),
            'rating'      => $validated['rating'] ?? 5,
            'order'       => $validated['order'] ?? 0,
            'is_active'   => $request->boolean('is_active'),
        ];

        // Gestion de l'avatar
        if ($request->hasFile('author_avatar')) {
            // Supprimer l'ancienne image
            if ($testimonial && $testimonial->author_avatar && Storage::disk('public')->exists($testimonial->author_avatar)) {
                Storage::disk('public')->delete($testimonial->author_avatar);
            }

            $file = $request->file('author_avatar');
            // Nom sécurisé : timestamp + slug + extension normalisée
            $extension = $file->getClientOriginalExtension();
            $extension = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'webp']) ? strtolower($extension) : 'jpg';
            $name = time() . '_' . Str::slug($validated['author_name']) . '.' . $extension;

            $data['author_avatar'] = $file->storeAs('testimonials', $name, 'public');
        }

        return $data;
    }

    /**
     * Nettoyage d'une chaîne
     */
    private function sanitize(?string $value): ?string
    {
        if ($value === null) return null;
        // Supprimer les balises HTML + les espaces superflus
        return trim(strip_tags($value));
    }
}
