@props(['user'])

<div {{ $attributes }} x-data="{
followersCount: {{ $user->followers()->count() }},
following : {{$user->isFollowedBy(auth()->user()) ? 'true' : 'false'  }},

follow(){
    axios.post('/follow/{{$user->id}}').then(res=>{
    this.following=!this.following
    this.followersCount=res.data.followersCount
    }).catch(err=>{
    console.log(err)
    })
}

}" class="mb-4 pb-4 lg:w-[320px] border-b lg:border-b-0 lg:border-l space-y-2 lg:px-8">
  {{ $slot }}
</div>
