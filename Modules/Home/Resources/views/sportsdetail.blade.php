@extends('layouts.frontend.main')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <div class="show-top-grids">
        <div class="col-sm-8 single-left">
          <div class="song">
            <div class="song-info">
              <h3>{{$sports->sname}}</h3>  
          </div>

            <div class="col-md-12">
            <div>
                <a href="{{route('gossip.detail',$sports->id)}}"><img src="{{asset('/images/'.$sports->image)}}" alt="" width="100%" /></a>
              </div>
            </div>
          </div>
          <div class="song-grid-right">
            <div class="share">
              <h5>Share this</h5>
              <ul>
                <li><a href="#" class="icon fb-icon">Facebook</a></li>
                <li><a href="#" class="icon twitter-icon">Twitter</a></li>
                <li><a href="#" class="icon pinterest-icon">Pinterest</a></li>
                <li><a href="#" class="icon whatsapp-icon">Whatsapp</a></li>
                <li class="view">200 Views</li>
              </ul>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12">
                    <h4>Published on 15 June 2015</h4>
                    <p style="font-size: 16px;">{{$sports->description}}</p>
                
          </div>
        </div>
        <div class="col-md-4 single-right">
          <h3>Other Sports</h3>
          <div class="single-grid-right">
            @if(count($others)>0)
            @foreach($others as $o)
            <div class="single-right-grids">
              <div class="col-md-4 single-right-grid-left">
                <a href="{{route('sports.detail',$o->id)}}"><img src="{{asset('/images/'.$o->image)}}" alt="" /></a>
              </div>
              <div class="col-md-8 single-right-grid-right">
                <a href="{{route('sports.detail',$o->id)}}" class="title">{{$o->sname}}</a>
                <p class="views">2,114,200 views</p>
              </div>
              <div class="clearfix"> </div>
            </div>
            @endforeach
            @else
            <div>Data Not Found</div>
            @endif
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>



      @stop