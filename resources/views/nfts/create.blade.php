<h1>Add new NFT</h1>

<form method="post" action="{{ url('/nfts/store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name NFT</label>
        <input type="name" class="form-control" name="name" id="name">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description NFT</label>
        <textarea class="form-control" name="description" id="description"></textarea>
    </div>
    <label for="collection">Collection</label>
    <select class="form-select" name="collection">
        <option selected value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

