 @foreach($students as $key=>$student)
                            <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td><img src="{{asset('uploads/students/'.$student->profile_image)}}" width="50" height="50" ></td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->reg_no}}</td>
                            <td>
                                <a href="javascript:void(0)" 
                                class="btn btn-sm btn-success editBtn"
                                data-id="{{$student->id}}"
                                data-name="{{$student->student}}"
                                data-reg_no="{{$student->reg_no}}"
                                data-image="{{$student->profile_image}}"
                                >
                                    <i class="las la-edit"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="las la-times"></i></a>
                            </td>
                            </tr>
                            @endforeach