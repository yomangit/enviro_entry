<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="74cdffe1-1210-4a47-8a7f-b6be3537f278">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = {
                    deferred: []
                }, a.zaraz.q = [], a.zaraz._f = function(e) {
                    return function() {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: t
                        })
                    }
                };
                for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a
                        .screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a
                        .zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e
                        .referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a
                        .zarazData.o = (new Date).getTimezoneOffset(), a.zarazData.q = []; a.zaraz.q.length;
                    ) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0, z.referrerPolicy = "origin", z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(
                        encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z,
                        t)
                }))
            }(w, d, 0, "script");
        })(window, document);
    </script>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="/register"><b>MSM</b> & <b>TTN</b></a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="/register " method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') }}"
                            placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" required value="{{ old('username') }}"
                            placeholder="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('username')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}"
                            placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                  
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" required value="{{ old('password') }}"
                            name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>




                    <div class="d-flex justify-content-end">
                        <button style="width: 3cm" type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                </form>
                <div class="social-auth-links text-center">

                    <a href="/login" class="text-center">I already have a membership</a>
                </div>

            </div>
        </div>


        <script src="assets/plugins/jquery/jquery.min.js"></script>

        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
