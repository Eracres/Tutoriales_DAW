from django.urls import path
from .views import ChisteListView

app_name='Chistes'

urlpatterns = [
    path("/", ChisteListView.as_view(), name='listado'),
]