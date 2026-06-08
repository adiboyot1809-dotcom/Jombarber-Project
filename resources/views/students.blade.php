@extends('master.layout')
@section('content')
    <!-- Home Section -->
    <section id="home" class="home section">

      <img src="assets/img/hero-img.jpg" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
        <h2>Welcome to Student Page</h2>
        <p><span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
      </div>

    </section><!-- /Home Section -->

    <!-- Student Section -->
    <section id="student" class="student section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>List of Student<h2>
            <table>
                <tr>
                    <th>No </th>
                    <th>First Name </th>
                    <th>Last Name </th>
                    <th>Email </th>
                    <th>PhoneNo </th>
                <tr>
                    <th>1 </th>
                    <th>Adib </th>
                    <th>Azmi </th>
                    <th>adiboyot@gmail.com </th>
                    <th>012345678 </th>
                <tr>
                    <th>2 </th>
                    <th>Aiman </th>
                    <th>Azmi </th>
                    <th>aiman@gmail.com </th>
                    <th>011234567 </th>
                <tr>
                    <th>3 </th>
                    <th>Afiq </th>
                    <th>Azmi </th>
                    <th>afiq@gmail.com </th>
                    <th>012234567 </th>
                <tr>
                </thead>

                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->matric_id}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone_no}}</td>
                    <tr>
                    @endforeach
                    <tbody>
            <table>
        </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        
    </section><!--/Student Section -->

<main>
@endsection

        