from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('mantenimientos/', views.lista_mantenimientos, name='lista_mantenimientos'),
    path('mantenimientos/<int:mantenimiento_id>/', views.detalle_mantenimiento, name='detalle_mantenimiento'),
]