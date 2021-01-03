<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets') }}/fe/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/fe/custom.css">

    <title>SIP Axioo Class Program</title>
</head>

<body>
    <section class="home" id="home">
        <nav class="navbar navbar-expand-lg navbar-dark mx-auto fixed-top">
            <div class="container nav-content">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets') }}/img/acp-logo-white.png" width="150" class="d-inline-block align-top"
                        alt="Axioo Logo" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active"><a href="#home" class="nav-link font-weight-bold">Home
                                <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a href="#about" class="nav-link font-weight-bold">About</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link font-weight-bold">Contact</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link font-weight-bold">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron pt-6 content-center">
            <div class="container text-center text-white j-content">
                <h1>Lorem Ipsum.</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique rem cum impedit magni neque
                    exercitationem voluptatibus officia quibusdam eveniet. Adipisci cum expedita sed distinctio omnis,
                    quod nesciunt deleniti eaque natus!
                </p>
                <button class="btn text-black bg-white font-weight-bold">Register</button>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-7">
                    <h1>About Us</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus iste deleniti accusamus tempora
                        at eaque, ullam ut perspiciatis delectus, odit a, repudiandae suscipit natus inventore
                        consequuntur? Qui beatae nemo iste recusandae voluptate nisi debitis rerum, non dolor cumque
                        sequi rem. At facere aperiam officiis perferendis non ea voluptas suscipit nulla?</p>
                </div>
                <div class="col">
                    <img src="{{ asset('assets') }}/img/Axioo-v1.png" width="50%">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>&copy; {{ date('Y') }} Axioo Class Program</p>
                </div>
                <div class="col text-right">
                    <a href="#home">Back To Top</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-7">
                    <h1>Contact</h1>
                    <form id="form-message" action="" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name <b class="text-danger">*</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Fullname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">E-mail <b
                                    class="text-danger">*</b></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="website" name="website" placeholder="URL">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-sm-2 col-form-label">Message <b
                                    class="text-danger">*</b></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="message" rows="3" name="message"
                                    placeholder="Message"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary mb-3">Send</button>
                    </form>
                </div>
                <div class="col">
                    <img src="{{ asset('assets') }}/img/Axioo-v1.png" width="50%">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>&copy; {{ date('Y') }} Axioo Class Program</p>
                </div>
                <div class="col text-right">
                    <a href="#home">Back To Top</a>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets') }}/fe/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/fe/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/fe/script.js"></script>
</body>

</html>
