
@extends('layouts.app')

@section('title', 'Tiefing Sangare | Développeur Full Stack & Expert SEO au Mali')
@section('meta_description', 'Portfolio officiel de Tiefing Sangare, développeur web Full Stack et fondateur de Masadigitale à Bamako, Mali. Création de sites web, applications, solutions IA et référencement SEO.')

@section('content')


<!-- Portfolio / Réalisations -->
<div class="section works align-left" id="works-section">
    <div class="fw">
        <div class="titles animated">
            <div class="title">Projets récents</div>
        </div>
        <div class="filters animated">
            <div class="f_btn active">
                <label><input type="radio" name="fl_radio" value="box-item" />Tous</label>
            </div>
            @php
                $categories = $projects->pluck('category')->unique()->filter();
            @endphp
            @foreach($categories as $cat)
            <div class="f_btn">
                <label><input type="radio" name="fl_radio" value="f-{{ Str::slug($cat) }}" />{{ $cat }}</label>
            </div>
            @endforeach
        </div>
        <div class="row box-items">
            @forelse($projects as $project)
            <div class="col col-m-12 col-t-6 col-d-6 box-item f-{{ Str::slug($project->category ?? 'projet') }}">
                <div class="item animated">
                    <div class="desc">
                        <div class="image">
                            <a href="#popup-{{ $project->id }}" class="has-popup">
                                @if($project->image)
                                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                                @else
                                    <img src="{{ asset('images/t1.jpg') }}" alt="{{ $project->title }}">
                                @endif
                            </a>
                        </div>
                        <div class="category">{{ $project->category ?? 'Projet' }}</div>
                        <div class="name">
                            <a href="#popup-{{ $project->id }}" class="has-popup">{{ $project->title }}</a>
                        </div>
                    </div>
                </div>
                <div id="popup-{{ $project->id }}" class="popup-box mfp-fade mfp-hide">
                    <div class="content">
                        <div class="image">
                            @if($project->image)
                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                            @endif
                        </div>
                        <div class="desc">
                            <div class="category">{{ $project->category ?? 'Projet' }}</div>
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->description }}</p>
                            @if($project->technologies)
                                <p><strong>Technologies :</strong> {{ $project->technologies }}</p>
                            @endif
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="btn">Voir le projet</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col col-m-12">
                <p class="text-center">Aucun projet pour le moment.</p>
            </div>
            @endforelse
        </div>
        <div class="clear"></div>
    </div>
</div>


@endsection
