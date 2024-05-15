from django.urls import path
from . import views

urlpatterns = [
    path('', views.lista_memes, name='lista_memes'),
    path('meme/<int:meme_id>/', views.detalle_meme, name='detalle_meme'),
]
