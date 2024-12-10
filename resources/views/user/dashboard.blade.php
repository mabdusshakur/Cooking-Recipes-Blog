@extends('layouts.user')
@section('content')

<script>
    axios.get('/api/v1/user/profile').then(function(response) {
        if(response.data && response.data.success == true) { 
            console.log(response.data);
            localStorage.setItem('user', JSON.stringify(response.data[0]));
        }
    }).catch(function(error) {
        console.log(error.response.data);
    });
</script>
@endsection