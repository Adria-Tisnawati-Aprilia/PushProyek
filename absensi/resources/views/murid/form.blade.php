<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Form Data Diri</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="{{url('css/app.css')}}" />

</head>

<body>

    <form action="{{route('inputData')}}" method="post">

        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">

            <h1 align="center">FORM Data Diri</h1>

                <div class="form-group">

                    <label for="" class="label-control">Nama Lengkap</label>

                    <input type="text" name="nama" class="form-control">

                </div>

                <div class="form-group">

                    <label for="" class="label-control">No Pengenal</label>

                    <input type="number" name="no_pengenal" class="form-control">

                </div>

                <div class="form-group">

                    <label for="" class="label-control">Jenis Kelamin</label>
                    <div class="form-check form-check-inline">
                        <label for="jenis_kelamin">
                            <input type="radio" name="jenis_kelamin"value="L" id="jenis_kelamin">
                            <input type="radio" name="jenis_kelamin"value="P" id="jenis_kelamin">
                        </label>

                </div>

                <div class="form-group">

                    <label for="" class="label-control">Kategori</label>
                    <div class="form-check form-check-inline">
                        <label for="kategori">
                            <input type="radio" name="kategori"value="Pelatihan" id="kategori">
                            <input type="radio" name="kategori"value="Penyewaan" id="kategori">
                        </label>

                </div>

                <div class="form-group">

                    <label for="" class="label-control">Alamat</label>

                    <input type="text" name="Alamat" class="form-control">

                </div>

                <div class="form-group">

                    <label for="" class="label-control">No. Hp</label>

                    <input type="number" name="number" class="form-control">

                </div>

                <div class="form-group">

                    <label for="" class="label-control">Keterangan</label>

                    <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>

                </div>

                {{csrf_field()}}

                <input type="submit" value="Simpan" class="btn btn-primary">

            </div>

        </div>

    </form>

</body>

</html>
