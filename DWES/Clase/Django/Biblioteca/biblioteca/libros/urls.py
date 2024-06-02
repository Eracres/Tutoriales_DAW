from django.urls import path
from .views import AutorListView, AutorDetailView, AutorFormView, LibroFormView, LibroDetailView

urlpatterns = [
    path('', AutorListView.as_view(), name='AutorList'),
    path('autorDetail/<slug:slug>/', AutorDetailView.as_view(), name='AutorDetail'),
    path('autorForm/', AutorFormView.as_view(), name='AutorForm'),
    path('libroForm/<slug>', LibroFormView.as_view(), name='LibroForm'),
    path('libroDetail/<slug:slug>/', LibroDetailView.as_view(), name='LibroDetail'),
]
