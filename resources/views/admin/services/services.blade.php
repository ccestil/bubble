<h2>Services</h2>
    
<form action="{{ route('services.store') }}" method="POST">
    @csrf

    <label for="service_name">Name</label>
    <input type="text" name="service_name" value="{{ old('service_name') }}">

    <label for="price_per_kg">Price</label>
    <input type="number" step="0.01" name="price_per_kg" value="{{ old('price_per_kg') }}">

    <input type="submit" value="create">


</form> 