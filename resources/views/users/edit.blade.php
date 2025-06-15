<x-layout>
    <x-slot:title>Edit Users</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan Nama Users">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Masukkan Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label></label>
                            <input type="text" class="form-control" id="password" placeholder="Masukkan Password">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark">Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout>
