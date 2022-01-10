@extends('layouts.template')

@section('title','Contact Info')

@section('main')
    <h1>Contact us</h1>
    @include('shared.alert')
    @if (!session()->has('success'))
    <form action="/contact-us" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                   class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                   placeholder="Your name"
                   required
                   value="{{ old('name','Demo') }}">
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                   class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                   placeholder="Your email"
                   required
                   value="{{ old('email','demo@example.com') }}">
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <select name="contact" id="contact"
                    class="form-control {{ $errors->first('contact') ? 'is-invalid' : '' }}"
                    required>
                <option value="">Select a contact</option>
                <option value="Info">Info</option>
                <option value="Billing">Billing</option>
                <option value="Support">Support</option>
            </select>
            <div class="invalid-feedback">{{ $errors->first('contact') }}</div>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="5"
                      class="form-control {{ $errors->first('message') ? 'is-invalid' : '' }}"
                      placeholder="Your message"
                      required
                      minlength="10">{{ old('message','New message\nLorem ipsum') }}</textarea>
            <div class="invalid-feedback">{{ $errors->first('message') }}</div>
        </div>
        <button type="submit" class="btn btn-success">Send Message</button>
    </form>
    @endif
@endsection
