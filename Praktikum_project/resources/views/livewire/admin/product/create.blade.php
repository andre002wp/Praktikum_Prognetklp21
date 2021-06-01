<div>
<form method="POST" wire:submit.prevent="submit">
    {{ method_field('PUT') }}
        <div class="card-body">
            <h4>Product Name</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                </div>
                <input type="text" wire:model="product_name" class="form-control @error('product_name') is invalid @enderror" placeholder="insert name">
            </div>
            @error('product_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <h4>Price</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                </div>
                <input type="text" wire:model="price" class="form-control @error('price') is invalid @enderror" placeholder="insert price">
                <!-- @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->
            </div>

            <h4>Description</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                </div>
                <input type="text" wire:model="description" class="form-control @error('description') is invalid @enderror" placeholder="insert description">
                <!-- @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->
            </div>

            <h4>Stock</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                </div>
                <input type="text" wire:model="stock" class="form-control @error('stock') is invalid @enderror" placeholder="insert stock">
                <!-- @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->
            </div>

            <h4>Weight</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                </div>
                <input type="text" wire:model="weight" class="form-control @error('weight') is invalid @enderror" placeholder="insert weight">
                <!-- @error('weight')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->
            </div>

            <h4>Image</h4>
            <div class="input-group mb-3">
                <input type="file" wire:model="image" class="form-control file"  data-browse-on-zone-click="true" enctype="multipart/form-data" required>
            </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
</div>
