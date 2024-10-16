<div>
  <div class="card card-statistics mb-30">
    <div class="card-body">
        <h5 class="card-title">{{$data[$counter]->title}}</h5>
        @foreach(preg_split('/(-)/',$data[$counter]->answers) as $index=>$answer)
<div class="custom-control custom-radio">
    <input type="radio" id="Custom{{$index}}"  name="CustomRadio" wire:click="nextQuestion('{{$data[$counter]->id}}','{{$data[$counter]->score}}','{{$answer}}','{{$data[$counter]->right_answer}}')">
    <label for="Custom{{$index}}"class='cutom-control-label' >{{$answer}}</label>
   
</div>
        @endforeach
    </div>

  </div>
</div>