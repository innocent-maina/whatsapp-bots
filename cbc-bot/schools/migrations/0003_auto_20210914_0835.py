# Generated by Django 3.2.7 on 2021-09-14 05:35

import datetime
from django.db import migrations, models
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('schools', '0002_subject_school'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='assignment',
            name='date_added',
        ),
        migrations.AddField(
            model_name='assignment',
            name='due_date',
            field=models.DateField(default=datetime.datetime(2021, 9, 15, 5, 35, 13, 162016, tzinfo=utc)),
        ),
        migrations.AddField(
            model_name='assignment',
            name='start_date',
            field=models.DateField(default=datetime.datetime(2021, 9, 14, 5, 35, 13, 162016, tzinfo=utc)),
        ),
    ]
