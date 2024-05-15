from django.shortcuts import render, get_object_or_404
from .models import Meme, Comentario

def lista_memes(request):
    memes = Meme.objects.all()
    return render(request, 'memes/lista_memes.html', {'memes': memes})

def detalle_meme(request, meme_id):
    meme = get_object_or_404(Meme, pk=meme_id)
    comentarios = Comentario.objects.filter(meme=meme).order_by('-fecha_publicacion')
    if request.method == 'POST':
        nombre_autor = request.POST.get('nombre_autor')
        texto = request.POST.get('texto')
        comentario = Comentario(meme=meme, nombre_autor=nombre_autor, texto=texto)
        comentario.save()
    return render(request, 'memes/detalle_meme.html', {'meme': meme, 'comentarios': comentarios})
