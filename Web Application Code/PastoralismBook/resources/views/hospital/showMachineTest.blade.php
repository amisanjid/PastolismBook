<table border=1 class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                        <th>Rain</th>
                        <th>Wind Speed</th>
                        <th>Barometric Presser</th>
                        <th>Wind Direction</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0; ?>
                    @foreach($data as $d)
                    <tr class="gradeX">
                    <?php $sl++; ?>
                        <td>{{$sl}}</td>
                        <td>{{$d->date}} </td>
                        <td>{{$d->time}} </td>
                        <td>{{$d->temperature}} </td>
                        <td>{{$d->humidity}} </td>
                        <td>{{$d->rain}} </td>
                        <td>{{$d->wind_speed}}</td>
                        <td>{{$d->barometric_presser}}</td>
                        <td>{{$d->wind_direction}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    <!--
                    <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                        <th>Rain</th> 
                        <th>Wind Speed</th>
                        <th>Barometric Presser</th>
                        <th>Wind Direction</th>
                    </tr>
                    </tfoot> -->
                    </table>