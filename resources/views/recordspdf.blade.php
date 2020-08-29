<title>Medical Records for {{$user->name}}</title>

<style>
    td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>
@php
    use App\record;
    $datad = record::where('pid',$user->id)->where('wid',$weight->id)->first();
@endphp
<div style="text-align: center;">
<h1>SAM/MAM Patient Treatment Records</h1>
</div>
<table border="1" class="table table-light" style="width: 100%;">
    <tbody>
        <tr>
            <td style="text-transform:capitalize;">Name of Child : {{$user->name}}</td>
            <td>Age :

                <?php $d1 = new DateTime($user->dateofbirth);
                $d2 = new DateTime(date('Y-m-d'));
                $interval = $d1->diff($d2);

                $diffInMonths  = $interval->m; //4
                $diffInYears   = $interval->y; //1
                //
                //

             echo     $diffInYears.' Year(s) '.$diffInMonths.' Month(s)'; //4 ?>
            </td>
            <td>
                Sex : {{$user->gender}}
            </td>
        </tr>
        <tr>
           <td>
            Date of Admission : <?php $time = strtotime($datad->date); echo date('d/m/Y',$time);  ?>
               </td>
               <td colspan="2" style="text-transform: capitalize;">
                Name of Caregiver : {{$datad->care}}
               </td>

        </tr>
        <tr>
            <td>
                Weight at admission : {{$weight->weight}} Kg
               </td>
            <td>
                Target Weight (Kg) : {{$datad->targetwkg}}
            </td>
            <td>
                W/Hz Score : {{$whz}}
            </td>
        </tr>
        <tr>
            <td>
                Oedema : <input @if($datad->returneddefaulter == 'yes') checked @else @endif class="form-check-input" type="radio" name="oedema" id="" value="yes"> Yes
                <input @if($datad->returneddefaulter == 'no') checked @else @endif class="form-check-input" type="radio" name="oedema" id="" value="no"> No

            </td>
            <td>
                HIV :   <input @if($datad->hiv == 'Positive') checked @else @endif class="form-check-input" type="radio" name="hiv" id="" value="Positive"> Positive
                <input @if($datad->hiv == 'Negative') checked @else @endif class="form-check-input" type="radio" name="hiv" id="" value="Negative"> Negative

            </td>
            <td>
                MUAC : {{$datad->muac}}
            </td>
        </tr>
        <tr>
            <td>
                Transfer Form : <input class="form-check-input" type="radio" name="transfer" id="" value="OTC"> OTC
            <input class="form-check-input" type="radio" name="transfer" id="" value="ITC"> ITC

            </td>
            <td>
                Readmission : <input class="form-check-input" @if($datad->readmission == 'yes') checked @else @endif  type="checkbox" name="readmission" id="" value="yes">

            </td>
            <td>
                Returned Defaulter : <input  class="form-check-input" @if($datad->returneddefaulter == 'yes') checked @else @endif type="checkbox" name="returned" id="" value="yes">

            </td>

        </tr>
        <tr>
            <td colspan="3">
                Others : {{$datad->others}}
            </td>
        </tr>
    </tbody>
</table>
