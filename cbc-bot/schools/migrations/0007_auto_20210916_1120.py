# Generated by Django 3.2.7 on 2021-09-16 08:20

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('schools', '0006_auto_20210915_1305'),
    ]

    operations = [
        migrations.AlterModelOptions(
            name='assignment',
            options={'ordering': ('-id',)},
        ),
        migrations.RemoveField(
            model_name='pricingmodel',
            name='daily_rate',
        ),
        migrations.RemoveField(
            model_name='pricingmodel',
            name='monthly_rate',
        ),
        migrations.RemoveField(
            model_name='pricingmodel',
            name='weekly_rate',
        ),
        migrations.RemoveField(
            model_name='subscription',
            name='expiry_date',
        ),
        migrations.AddField(
            model_name='pricingmodel',
            name='profit_margin',
            field=models.FloatField(default=5.0),
        ),
        migrations.AddField(
            model_name='subscription',
            name='balance',
            field=models.FloatField(default=0),
        ),
        migrations.AlterField(
            model_name='subject',
            name='school',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, related_name='subjects', to='schools.school'),
        ),
    ]
