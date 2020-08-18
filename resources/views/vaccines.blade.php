@extends('layouts.app')

@section('content')
@php
    use App\patient;
    use App\weight;
    use App\takenvaccine;
    use App\treatment;
    use App\vaccine;
$patpat = patient::where('id',$p)->first();
@endphp
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vaccines </h5>
            <div class="row">
                <div class="col">
                    <b>Name : {{$patpat['name']}}</b>
                </div>
                    <div class="col">
                       <b>Gender : {{$patpat['gender']}}</b>
                    </div>
                    <div class="col">
                      <b>Age :
                        @php
                               //

                                $d1 = new DateTime($patpat['dateofbirth']);
                                $d2 = new DateTime(date('Y-m-d'));
                                $interval = $d1->diff($d2);

                                $diffInMonths  = $interval->m; //4
                                $diffInYears   = $interval->y; //1
                                //
                                //



                             echo     $diffInYears.' Year(s) '.$diffInMonths.' Month(s) '; //4

                            @endphp


                      </b>
                    </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div>
                <table class="table stripe table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Rounds</th>
                            <th>Status</th>
                            <th>Next Visit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $x = 0;
                        @endphp
                        @foreach ($v as $v)
                        @php
                            $x++;
                        @endphp
                            <tr>
                                @php
                                    $dated = strtotime($v->time,strtotime($patpat['dateofbirth']));
                                    $conv = date('Y-m-d',$dated);
                                    $now = date('Y-m-d');
                                    $vaccinedate = takenvaccine::where('vid',$v->id)->where('pid',$p)->orderBy('id','DESC')->first();
                                    $vs = takenvaccine::where('vid',$v->id)->where('pid',$p)->orderBy('id','DESC')->get();
                                @endphp

                                <td>{{$x}}</td>
                            <td>{{$v->name}}</td>
                                <td>{{$v->time}}</td>
                                <td>{{$v->round}} Round(s)

                                    @if (count($vs)<1)
                                    <span class="badge badge-danger">{{count($vs)}} Taken</span>

                                    @else

                                        @if ($v->round>count($vs))
                                        <span class="badge badge-warning">{{count($vs)}} Remaining</span>
                                                                                @else
                                        <span class="badge badge-success" title="Completed"> <i class="fa fa-check" aria-hidden="true"></i> </span>
                                                                                @endif
                                    @endif
                                </td>
                                <td>

                                    @php
                                        $lasttake = takenvaccine::where('vid',$v->id)->where('pid',$p)->orderBy('id','DESC')->first();
                                    @endphp
                                    @if(is_null($lasttake['vid']))
                                    <span class="badge badge-warning"  title="Vaccine Not Taken">Not Taken</span>
                                    @else
                                    <span class="badge badge-success" title="Vaccine Taken">Taken</span>
                                    @endif



                                </td>

                                <td> @if(is_null($lasttake['next']))
                                    <span class="badge badge-warning" title="Next Date Not Assigned"> <i class="fa fa-calendar-times" aria-hidden="true"></i> ---</span>
                                    @else
                                    <span class="badge badge-success" title="Assigned to : {{$lasttake['next']}}"> <i class="fa fa-calendar-check" aria-hidden="true"></i></span>  <?php $time = strtotime($lasttake['next']); echo date('d/m/Y',$time);  ?>
                                    @endif
                                </td>
                                <td>





                                    <button @if ($v->round<=count($vs))
                                            disabled
                                        @else

                                        @if ($v->time == '+0 weeks' && count($vs)<1)


                                        @else
                                            @if (count($vs)>=1)
                                                @php
                                                $tarehed = strtotime($v->time,strtotime($vaccinedate['next']));
                                                $trhed = date('Y-m-d',$tarehed);
                                                @endphp
                                                @if ($now>=$trhed)

                                                @else
                                                    @if ($lasttake['next']<=$now)

                                                    @else


                                                disabled
                                                    @endif
                                                @endif
                                            @else
                                                @php
                                                $tarehed = strtotime($v->time,strtotime($patpat['dateofbirth']));
                                                $trhed = date('Y-m-d',$tarehed);
                                                @endphp
                                                @if ($now>=$trhed)

                                                @else
                                                    @if ($lasttake['next']<=$now)

                                                    @else


                                                disabled
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                        @endif type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$x}}">
                                       <i class="fas fa-syringe    "></i> Give
                                      </button>


                                      <div class="modal fade" id="exampleModal{{$x}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Give <b>{{$v->name}}</b> Vaccine <br> to <b style="text-transform: uppercase;"> {{$patpat['name']}} </b></h5>





                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>


                                            </div>

                                            <form action="{{route('savevaccine')}}" method="post">
                                            <div class="modal-body">
                                                    <div class="form-group">
@csrf
                                                            @if ($v->time == '+0 weeks')
                                                                <input type="text" name="next" value="" hidden>
                                                            @else
                                                            <label for="">Next Visit</label>
                                                            <select type="text" name="next" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                                @php
                                                                    $date = date('d M Y');
                                                                    $thirtyDaysUnix = strtotime($v->time, strtotime($date));

                                                                    @endphp
                                                                    @php

                                                                    $cvb = date("Y-m-d", $thirtyDaysUnix);
                                                                    @endphp
                                                                <option selected value="{{$cvb}}">
                                                                    @php

                                                                    $cvb = date("d M Y", $thirtyDaysUnix);
                                                                    @endphp
                                                                    {{$cvb}}
                                                                </option>
                                                            </select>
                                                            @endif
                                                    </div>
                                            </div>

                                            <input type="text" value="{{$p}}" name="pid" hidden>
                                            <input type="text" value="{{$v->id}}" name="vid" hidden>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                @if ($v->time == '+0 weeks')
                                                    No
                                                @else Cancel @endif
                                                </button>
                                              <button type="submit" class="btn btn-primary">
                                                @if ($v->time == '+0 weeks')
                                                        Yes
                                                @else Submit @endif
                                                </button>
                                            </div>


                                        </form>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
