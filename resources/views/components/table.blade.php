<table class="table">
  <thead>
    <tr>
        <td>{{$first_col_name}}</td>
        <td>{{$second_col_name}}</td>
        <td>{{$third_col_name}}</td>
        <td>{{$fourth_col_name}}</td>
        <td>{{$five_col_name}}</td>
        <td>{{$six_col_name}}</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$publictaion_number}}</th>
      <td>{{$user_name}}</td>
      <td>{{$product_name}}</td>
      <td>{{$product_status}}</td>
      <td>{{$product_date}}</td>
      <td>{{$slot}}</td>
    </tr>
  </tbody>
</table>

<div>
    <p>Номер публикации: {{ $publictaion_number }}</p>
    <p>Имя пользователя: {{ $user_name }}</p>
    <p>Название продукта: {!! $product_name !!}</p>
    <p>Статус продукта: {{ $product_status }}</p>
    <p>Дата публикации: {{ $product_date }}</p>
</div>