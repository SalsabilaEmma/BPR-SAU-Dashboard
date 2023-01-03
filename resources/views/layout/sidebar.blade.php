<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            {{-- <a href=""> --}}
                <img src="../bpr_sau_dashboard8/gallery/cropped-surya-artha-utama-2.webp" alt="logo" width="100"
                    class="shadow-light rounded-square">
                {{-- </a> --}}
        </div><br><br><br>
        <ul class="sidebar-menu">
            <li class="menu-header">Main Feature</li>
            <li>
                <a class="nav-link" href="{{ route('daftarTabungan') }}">
                    <i class="fa fa-list"></i>
                    <span class="text-dark">Saldo Tabungan</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('getMutasiTopup') }}">
                    <i class="fa fa-credit-card"></i>
                    {{-- <input type="text" name="cif" value="{{ $k['cif'] }}" hidden> --}}
                    <span class="text-dark">Top Up Suroboyo Pay</span>
                </a>
            </li>
            <br><br>
            <li>

            {{-- <li>
                <a class="nav-link">
                    <form action="{{ route('getMutasiTopup') }}" method="post">
                        @csrf
                        <i class="fa fa-credit-card"></i>
                        <button><span class="text-dark">Top Up Surabaya Pay</span></button>
                    </form>
                </a>
            </li> --}}

                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="fa fa-power-off" style="color: brown" aria-hidden="true"></i>
                    <span class=" btn btn-outline-danger">Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
