from django.urls import path
from . import views

urlpatterns = [
    path('', views.ObraListView.as_view(), name='obra_list'),
    path('<slug:slug>/', views.ObraDetailView.as_view(), name='obra_detail'),
]