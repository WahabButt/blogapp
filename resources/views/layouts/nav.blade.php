<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">Home</a>
            @if(!Session::get('role'))
            <a class="nav-link" href="/login">Login</a>
            @endif
                @if(Session::get('role'))
                <a class="nav-link" href="/logout">Logout</a>
                @if(Session::get('role') == 'admin')
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                @endif
                @if(Session::get('role') == 'simple')
                    <a class="nav-link" href="/posts/create">Create A Blog Post</a>
                @endif
                <a class="nav-link" style="float: right" href="#">{{ Session::get('name') }}</a>
            @endif
        </nav>
    </div>
</div>