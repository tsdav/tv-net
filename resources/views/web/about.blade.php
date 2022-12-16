@extends('web.base')
@php
    $technicalData = "Տեխնիկական ցուցանիշներ";
    $reportsTitle = "Հաշվետվություններ";
@endphp
@section('content')
    <div class="abouts-content-container">
        <div class="about-content">
            <div class="about-image-container">
                <img src="{{ asset('images/service.png') }}" alt="">
            </div>
            <div class="main-about-content">
                <h1>About us</h1>
                <h2>TvNet is an internet Provider</h2>
                <span>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                    ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived
                    not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the
                    1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                    Aldus PageMaker including versions of Lorem Ipsum.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                    ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived
                    not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the
                    1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                    Aldus PageMaker including versions of Lorem Ipsum.
                </span>
            </div>
        </div>
        <div class="contact-us-form-container">
            <div class="contact-image-container">
                <img src="{{ asset('images/contact.png') }}" alt="">
            </div>
            <div class="main-about-content">
                <h1>Contact with us</h1>
                <form action="#">
                    <label for="name">Full Name</label>
                    <input type="email" class="subscriber-email" placeholder="Email">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Full Name">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Full Name">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
