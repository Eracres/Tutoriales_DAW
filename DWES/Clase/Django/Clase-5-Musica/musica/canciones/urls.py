from django.urls import path
from . import views

urlpatterns = [
    path('', views.CancionListView.as_view(), name='listado'),
    path('subir/', views.SubirCancionView.as_view(), name='subir_cancion'),
]
