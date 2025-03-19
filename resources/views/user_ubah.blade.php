<h1>Form Ubah Data User</h1>
<a href="{{ route('/user') }}">Kembali</a>
<br>

<form method="POST" action="{{ route('/user/ubah_simpan', $data->user_id) }}">
    @csrf
    @method('PUT')

    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="{{ $data->username }}">
    <br>

    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" value="{{ $data->nama }}">
    <br>

    <label for="level_id">Level ID</label>
    <input type="number" id="level_id" name="level_id" value="{{ $data->level_id }}">
    <br>

    <input type="submit" class="btn btn-success" value="Ubah">
</form>
