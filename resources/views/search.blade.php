<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    body{

background: #d1d5db;
}

.height{

height: 100vh;
}

.form{

position: relative;
}

.form .fa-search{

position: absolute;
top:20px;
left: 20px;
color: #9ca3af;

}

.form span{

    position: absolute;
right: 17px;
top: 13px;
padding: 2px;
border-left: 1px solid #d1d5db;

}

.left-pan{
padding-left: 7px;
}

.left-pan i{

padding-left: 10px;
}

.form-input{

height: 55px;
text-indent: 33px;
border-radius: 10px;
}

.form-input:focus{

box-shadow: none;
border:none;
}
button {
    width: 200px;
    padding: 20px;
    font-size: 20px;
    font-weight: 700;
    cursor: pointer;
    border: none;
}

.twenty-one {
    background: #fff;
    color: royalblue;
    border: px solid royalblue;
    text-transform: uppercase;
    position: relative;
    z-index: 1;
    transition: color 400ms;
}

.twenty-one::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: royalblue;
    z-index: -1;
    transition: transform 400ms ease-out;
    transform: scaleX(0);
    transform-origin: left;
}

.twenty-one:hover::before {
   transform: scaleX(1);
   border-radius: 5px;
}
/* .twenty-one:after {
   border-radius: 5px;
} */



.twenty-one:hover {
    color: #fff;
}

</style>
<body>
    <div class="container">

        <div class="row height d-flex justify-content-center align-items-center">

          <div class="col-md-6 mt-5">

            <div class="form">
              
              

              <form method="POST" action="{{ route('search') }}">
                @csrf

                @if(!empty($word))
                    <input type="text" name="search" id="search" class="form-control form-input" placeholder="Search anything..." value="{{$word}}">
                @else
                    <input type="text" name="search" id="search" class="form-control form-input" placeholder="Search anything..." >
                @endif

                <button type="submit" hidden>search</button>
              </form>

            </div>
             <div class="col-md-6 mt-3">
                <button type="button" class="btn btn-outline twenty-one mb-2" >By Price</button>
                <button type="button" class="btn btn-outline twenty-one">By Quality</button>
             </div>

             @if(!empty($searchResult))

             @foreach($searchResult as $item)

            <div class="col-md-12 mt-2">

                @if($item->link_of == "website")
                    <i class="fa fa-server pe-1" style="color: blue;"></i>
                @elseif($item->link_of == "fb")
                    <i class="fa fa-facebook-square pe-1" style="color: blue;"></i>
                @endif

                <a href="{{ $item->link }}">{{ $item->link }}</a>
                 <h4 >{{ $item->name }}</h4>
                 <p style="text-align: justify;">
                 {{ $item->short_des }}
                 </p>
                 
            </div> 

            @endforeach

            @endif

        </div>
         
          
        </div>
    
          
        
      </div>
    
</body>
</html>