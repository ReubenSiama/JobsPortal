@extends('layouts.master')
@section('title','Contact Us')
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            Contact
        </b>
    </h4>
    Keep up to date with latest news
</div>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-md-6">
            <h5>Keep In Touch</h5>
            <form action="#" method="post">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                <br>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <br>
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                <br>
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="10" rows="5" class="form-control" placeholder="Message"></textarea>
                <br>
                <input type="submit" value="Send" class="btn btn-success btn-lg">
            </form>
        </div>
        <div class="col-md-6">
            <h5>Office</h5>
            <i class="large-font-fa fa fa-map-marker" aria-hidden="true"></i> Kulikawn, Aizawl, Mizoram
            <br>
            <i class="large-font-fa fa fa-phone" aria-hidden="true"></i> Call Us : 34534345345
            <br>
            <i class="large-font-fa fa fa-fax" aria-hidden="true"></i> Fax : 34534534534
            <br>
            <i class="large-font-fa fa fa-envelope-o" aria-hidden="true"></i> Email : <a class="contact-link" href="mailto:some@mail.com">some_mail@gmail.com</a>
        </div>
    </div>
</div>

@stop