<h2>ახალი სერვისის მოთხოვნა</h2>

<p><strong>სერვისი:</strong> {{ $data['service'] }}</p>

<p><strong>სახელი:</strong> {{ $data['name'] }}</p>

@if(!empty($data['address']))
    <p><strong>მისამართი:</strong> {{ $data['address'] }}</p>
@endif

<p><strong>ტელეფონი:</strong> {{ $data['phone'] }}</p>

@if(!empty($data['message']))
    <p><strong>დამატებითი ინფორმაცია:</strong></p>

    <p>{{ $data['message'] }}</p>
@endif
