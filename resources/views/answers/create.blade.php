{!! Form::open(['route' => 'answer.store','files' => true ] ) !!}

                <div class="form-group questions">
                    {!! Form::label('content', '回答') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>

                
                <div class="form-group questions">
                    {!! Form::label('answer_image_path', '画像添付（あれば）') !!}
                    {!! Form::file('answer_image_path', null, ['class' => 'form-control']) !!}
                </div>
                
                <input type="hidden" name='question_id' value='{{$questions->id}}'>
                

                {!! Form::submit('回答投稿', ['class' => 'btn btn-primary btn-block questions']) !!}
{!! Form::close() !!}