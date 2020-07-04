# register
- endpoint  : /register
- metod     : post
- param     : email, password
> **email** (yang di input tidak boleh sama, hanya bisa di isi dengan format email, maksimal 50 karakter, tidak boleh kosong). Contoh : "ervana@gmail.com"
> **password** (tidak boleh kosong, minimal 4 karakter). Contoh : "1234"

# login
- endpoint  : /login
- metod     : post
- param     : email,password
> **email** (hanya bisa di isi dengan format email, maksimal 50 karakter, tidak boleh kosong). Contoh : "ervana@gmail.com"
> **password** (tidak boleh kosong, minimal 4 karakter). Contoh : "1234"

# index
- endpoint  : /jamaah
- metod     : get

# create
- endpoint  : /jamaah/create
- metod     : post
- param     : namaJamaah, gender, telpJamaah
> **namaJamaah** (Maksimal 50 karakter, tidak boleh kosong). Contoh : "ervan"
> **gender** (Hanya bisa di isi dengan huruf 'L' atau 'P', tidak boleh kosong). Contoh : "L"
> **telpJamaah** (Maksimal 15 karakter, tidak boleh kosong). Contoh : "123456789"

# update 
- endpoint  : /jamaah/update/{idJamaah}
- metod     : put
- param     : namaJamaah, gender, telpJamaah
> **namaJamaah** (Maksimal 50 karakter, tidak boleh kosong). Contoh : "Ervan S A"
> **gender** (Hanya bisa di isi dengan huruf 'L' atau 'P', tidak boleh kosong). Contoh : "L"
> **telpJamaah** (Maksimal 15 karakter, tidak boleh kosong). Contoh : "1234"

# delete
- endpoint  : /jamaah/delete/{idJamaah}
- metod     : delete

# show
- endpoint  : /jamaah/show/{idJamaah}
- metod     : get
