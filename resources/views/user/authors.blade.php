@extends('layouts.app')
@section('content')
<section class="page-header py-5">
     <div class="container">
         <div class="page-title text-center">
             <h3>Popular Authors</h3>
         </div>
     </div>
 </section>     @include('user.partials._authorIndex')
     @include('user.partials._registerAuthor')
@endsection