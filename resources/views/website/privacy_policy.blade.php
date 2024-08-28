@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container privacy-policy py-5">

    <div class="row">
        <div class="col-md-6 my-1">
            <h3 class="main-headings position-relative text-start">
                Privacy Policy
                <div class="border-under-main-heading"></div>
            </h3>
        </div>
    </div>
    <div class="privacy-section mt-4">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores sit nemo nisi deserunt reprehenderit totam quae, molestias tempora impedit facilis ratione, excepturi voluptatem quis sint nam consequatur perspiciatis. Veritatis pariatur non natus fuga quia sapiente, saepe fugit facere quam rem minima, quibusdam nam, maiores exercitationem quidem unde dolor? Repellendus, libero? Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad totam pariatur dolore fugiat voluptates praesentium amet cupiditate sapiente modi, tenetur voluptatibus natus molestias doloremque hic. Facilis, consequatur ad quis laboriosam consectetur blanditiis, ullam commodi voluptate neque quam dolorem accusantium reprehenderit vitae saepe libero suscipit nihil iure quo dignissimos. Atque, temporibus.</p>
        <h6 class="fw-bold">A. Collection of Information</h6>
        <p>The personal information that we collect from you, either directly or indirectly, will depend on how you interact with us and the Platform. Such personal information broadly falls into the following categories:</p>
        <p class="fw-bold">Information That You Provide to Us</p>
        <p>We collect personal information directly from you when you choose to provide us with this information through your use of the Platform and through your other interactions with us, such as where you issue a complaint. Certain parts of the Platform ask you to provide personal data in order to set up and use it as a Buyer or Seller.</p>

        <table class="privacy-table">
            <thead>
                <tr>
                    <th>Data Category</th>
                    <th>Data Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Buyer Contact Information</td>
                    <td>Such as your name, address, phone number, email address.</td>
                </tr>
                <tr>
                    <td>Buyer Payment Information</td>
                    <td>Such as credit card or similar payment information that you intend to purchase with, billing and delivery address.</td>
                </tr>
                <tr>
                    <td>Purchase Information</td>
                    <td>Such as details of the goods purchased and how many.</td>
                </tr>
                <tr>
                    <td>Complaint Information</td>
                    <td>Such as information connected with the Platform or goods and/or services purchased via the Platform as such information relates to a complaint.</td>
                </tr>
                <tr>
                    <td>Identity Information</td>
                    <td>Such as a form of ID like a passport or other identity verification for after-sales services.</td>
                </tr>
                <tr>
                    <td>Correspondence Information</td>
                    <td>Such as your correspondence relating to a customer service department, chat service, telephone or email.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="privacy-section">
        <h6 class="fw-bold">B. Use of Personal Data</h6>
        <p>We use the personal information that we collect for the following purposes:</p>
        <ul>
            <li>To provide you with the Platform and its services.</li>
            <li>To process your orders and payments.</li>
            <li>To communicate with you about your orders, payments, and other Platform-related matters.</li>
            <li>To improve the Platform and its services.</li>
            <li>To protect the security of the Platform and its users.</li>
            <li>To comply with legal obligations.</li>
        </ul>
    </div>

    <div class="privacy-section">
        <h6 class="fw-bold">C. Disclosure or Sharing of Personal Data</h6>
        <p>We may disclose your personal information to third parties:</p>
        <ul>
            <li>To our service providers who assist us in providing the Platform and its services.</li>
            <li>To comply with legal obligations.</li>
            <li>To protect the rights, property, or safety of us, our users, or others.</li>
        </ul>
    </div>

</div>
</div>




@endsection