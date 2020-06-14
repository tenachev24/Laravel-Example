<!-- Page content begins -->
<style>
    body {
        font-family: Arial, monospace;
        padding: 20px;
        background: #95999c;
    }

    /* Header/Blog Title */
    .header {
        padding: 30px;
        font-size: 40px;
        text-align: center;
        background: white;
    }

    /* Create two unequal columns that floats next to each other */
    /* Left column */
    .leftcolumn {
        float: left;
        width: 75%;
        color: #383d41;
    }

    /* Content */
    .content {
        background-color: white;
        width: 50%;
        padding: 20px;
        border: outset;
    }

    /* Add a card effect for articles */
    .card {
        background-color: white;
        padding: 20px;
        margin-top: 20px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<body>
<div class="header">
    <h2>All Posts</h2>
</div>
<div class="col-sm-4 text-right">
    @if(!auth()->guest())
        <a href="{{ url('post/new')}}">
            <button style="width: 10%; height: 5%; color: #1f6fb2">
                Create Post
            </button>
        </a>
    @endif
</div>
<div class="row">
    <div class="leftcolumn">
        <div class="card">
            @foreach($data as $item)
                @foreach($item as $str)
                    @if($str->status == 0 and Auth::user()['admin'] == 0)
                    @else
                        <h2>Title: {{$str->title}}</h2>
                        <h5>Author: {{$str->author}}, {{date_format($str->created_at, 'H:i:s d.m.Y')}}</h5>
                        <div>Content:</div>
                        <div class="content">
                            @if(strlen($str->content) > 50)
                                {{substr($str->content, 0, 50). '...'}}
                            @else
                                {{$str->content}}
                            @endif
                        </div>
                        <div>
                            @if(Auth::user()['admin'] == 1)
                                <a href="{{url('previewPost/'. $str->id.'/')}}">
                                    <button>Preview</button>
                                </a>
                                @if($str->status == 0)
                                    <h5>status: <label style="color: red">Disapproved</label></h5>
                                @else
                                    <h5>status: <label style="color: green; padding: 5px;">Approved</label></h5>
                                    <div style="border-top: 1px solid #000000;"></div>
                                @endif
                            @else
                            <div>
                                <a href="{{url('previewPost/'. $str->id.'/')}}">
                                    <button>Preview</button>
                                </a>
                                <h5>status: <label style="color: green; padding: 5px;">Approved</label></h5>
                                <div style="border-top: 1px solid #000000;"></div>
                            </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
</body>
