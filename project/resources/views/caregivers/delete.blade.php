



<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
    <form method="POST" action="{{$agency ->id}}/caregivers/{{$caregiver->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <a class="text-danger"  href="#" onclick="$(this).closest('form').submit()"><sm>[Delete]</sm></a> 

    </form>
