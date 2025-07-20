<div>
    <x-input-label for="title" :value="__('Title')"/>
    <x-text-input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
        class="block w-full mt-1"
        />
    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
</div>
<div>
    <x-input-label for="body" :value="__('Body')"/>
    <x-textarea name="body" id="body" cols="30" rows="10"
                class="block w-full mt-1">{{ old('body', $post->body) }}</x-textarea>
    <x-input-error :messages="$errors->get('body')" class="mt-2"/>
</div>
