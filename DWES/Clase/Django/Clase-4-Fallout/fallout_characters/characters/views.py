from django.shortcuts import render, get_object_or_404
from .models import Character

def character_list(request):
    characters = Character.objects.all()
    return render(request, 'characters/character_list.html', {'characters': characters})

def character_detail(request, slug):
    character = get_object_or_404(Character, slug=slug)
    return render(request, 'characters/character_detail.html', {'character': character})
