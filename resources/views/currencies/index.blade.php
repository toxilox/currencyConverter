@extends ('layout')


@section ('content')
  <h1>Currency Converter</h1>
  <div>

    <select>
      <option value="">Select a currency:</option>
      @foreach ($currencies as $currency)
        <option value="{{ $currency->iso_4217 }}">{{ $currency->iso_4217 }}</option>
      @endforeach
    </select>

    <input type="text" name="value" value="0"/>

    <select>
      <option value="">Select a currency:</option>
      @foreach ($currencies as $currency)
        <option value="{{ $currency->iso_4217 }}">{{ $currency->iso_4217 }}</option>
      @endforeach
    </select>

  </div>
  <div>
    <button id="update_currencies" class="btn btn-primary btn-xs">Update Currencies</button>
    <button id="truncate" class="btn btn-danger btn-xs btn-detail" type="button">Clean</button>
  </div>

  <div>
    <table class="table">
      <tr>
        <th>ISO 4217</th>
        <th>Name</th>
        <th>Date Created</th>
        <th>Date Modified</th>
        <th>Rate</th>
      </tr>

      @foreach ($currencies as $currency)
      <tr class="currency_row">
        <td>{{ $currency->iso_4217 }}</td>
        <td>{{ $currency->name }}</td>
        <td>{{ $currency->date_created }}</td>
        <td>{{ $currency->date_modified }}</td>
        <td>{{ $currency->rate }}</td>
      </tr>
    @endforeach

    </table>
  </div>

@endsection
