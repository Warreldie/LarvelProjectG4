<h1>Add new NFT</h1>

<form action="post" action="{{ url('/nfts/store') }}">
    <div class="mb-3">
        <label for="name" class="form-label">Name NFT</label>
        <input type="name" class="form-control" id="name">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descrition NFT</label>
        <textarea class="form-control" id="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

