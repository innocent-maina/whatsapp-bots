# Generated by Django 3.2.7 on 2021-09-14 05:36

from django.db import migrations, models
import django.utils.timezone


class Migration(migrations.Migration):

    dependencies = [
        ('schools', '0003_auto_20210914_0835'),
    ]

    operations = [
        migrations.AlterField(
            model_name='assignment',
            name='due_date',
            field=models.DateField(default=django.utils.timezone.now),
        ),
        migrations.AlterField(
            model_name='assignment',
            name='start_date',
            field=models.DateField(default=django.utils.timezone.now),
        ),
    ]
