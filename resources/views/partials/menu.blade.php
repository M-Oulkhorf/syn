@once
<div class="navigation">
    <ul>
        <li></li>
        <li>
            <a href="{{ route('entrepreneurs.index') }}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Accueil</span>
            </a>
        </li>
        
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="notifications-outline"></ion-icon>
                </span>
                <span class="title">Notifications</span>
            </a>
        </li>
        
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="settings-outline"></ion-icon>
                </span>
                <span class="title">Profile</span>
            </a>
        </li>
        
        <li>
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Se déconnecter</span>
                </a>
            </form>
        </li>
    </ul>
</div>
@endonce