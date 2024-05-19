from django.urls import path
from . import views

urlpatterns = [
    path('', views.obra_list, name='obra_list'),
    path('obra/<slug:slug>/', views.obra_detail, name='obra_detail'),
    path('api/obras/', views.ObraDeArteListCreate.as_view(), name='obra_list_create_api'),
    path('api/obras/<int:pk>/', views.ObraDeArteRetrieveUpdateDestroy.as_view(), name='obra_detail_api'),
]
