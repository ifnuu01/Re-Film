@extends('layouts.dashboard')

@section('guide-active')
    active rounded
@endsection

@section('halaman')
    Page Guide
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="text-white mb-4">Guide</h3>
        <div class="accordion" id="guideAccordion">
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-user-plus mx-2"></i> Register
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#guideAccordion">
                    <div class="accordion-body">
                        Create an account to start using ReFilm.
                        <ul>
                            <li>Go to the <a href="{{ route('register') }}" class="text-orange">Sign Up</a> page.</li>
                            <li>Fill in your details and submit the form.</li>
                            <li>Check your email for a confirmation link.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-sign-in-alt mx-2"></i> Login
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#guideAccordion">
                    <div class="accordion-body">
                        Access your account to enjoy personalized features.
                        <ul>
                            <li>Go to the <a href="{{ route('login') }}" class="text-orange">Log In</a> page.</li>
                            <li>Enter your email and password.</li>
                            <li>Click the "Log In" button.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-film mx-2"></i> Add Film
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#guideAccordion">
                    <div class="accordion-body">
                        Add your favorite films to the database.
                        <ul>
                            <li>Navigate to the "Add Film" section from the dashboard.</li>
                            <li>Fill in the film details and submit the form.</li>
                            <li class="text-warning">You need to be logged in to write a review.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <i class="fas fa-info-circle mx-2"></i> Detail Film
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#guideAccordion">
                    <div class="accordion-body">
                        View detailed information about each film.
                        <ul>
                            <li>Click on a film title to view its details.</li>
                            <li>Read the synopsis, cast, and other information.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <i class="fas fa-star mx-2"></i> Review Film
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#guideAccordion">
                    <div class="accordion-body">
                        Write and read reviews for different films.
                        <ul>
                            <li>Go to the film's detail page.</li>
                            <li>Scroll down to the reviews section.</li>
                            <li>Write your review and submit it.</li>
                            <li class="text-warning">You need to be logged in to write a review.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <i class="bi bi-card-list mx-2"></i>Genre
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#guideAccordion">
                    <div class="accordion-body">
                        Browse films by genre to find what you like.
                        <ul>
                            <li>Use the genre filter on the films page.</li>
                            <li>Select a genre to view related films.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection