{!! Form::open(['route' => 'questions.store','files' => true]) !!}
                <div class="form-group questions">
                    {!! Form::label('suject', '科目') !!}
                    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group questions">
                    {!! Form::label('content', '質問内容') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                
                
                <div class="form-group questions">
                    {!! Form::label('image_path', '画像添付（あれば）') !!}
                    {!! Form::file('image_path', null, ['class' => 'form-control']) !!}
                </div>
                
                

                {!! Form::submit('質問投稿', ['class' => 'btn btn-primary btn-block questions']) !!}
            {!! Form::close() !!}