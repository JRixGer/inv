<table class="table table-responsive">
  <thead>
    <tr>
      <th>Offer ID</th>
      <th>SKU</th>
      <th>Goal ID</th>
      <th>Type</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
    <tr>
      <td>{{$row->offer_id}}</td>
      <td>{{$row->prodCode}}</td>
      <td>{{$row->goal_id}}</td>
      <td>{{$row->type}}</td>
      <td data-id="{{$row->id}}"><a href="#" class="btnDelete" >DELETE</a> | <a href="#" class="btnEdit" >EDIT</a></td>
    </tr>
    @endforeach
  </tbody>
</table>