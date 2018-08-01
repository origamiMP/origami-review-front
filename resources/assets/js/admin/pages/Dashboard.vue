<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
        <stats-card data-background-color="blue">
          <template slot="header">
            <md-icon >store</md-icon>
          </template>

          <template slot="content">
            <p class="category">Nombre de commandes</p>
            <h3 class="title">3627</h3>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>date_range</md-icon>
              Cette année
            </div>
          </template>
        </stats-card>
      </div>
      <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
        <stats-card data-background-color="orange">
          <template slot="header">
            <md-icon >content_copy</md-icon>
          </template>

          <template slot="content">
            <p class="category">Nombre d'avis Origami</p>
            <h3 class="title">572</h3>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>date_range</md-icon>
              Cette année
            </div>
          </template>
        </stats-card>
      </div>
      <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
        <stats-card data-background-color="primary">
          <template  slot="header">
            <md-icon >star</md-icon>
          </template>

          <template slot="content">
            <p class="category">Note Origami</p>
            <h3 class="title">4,75/5</h3>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>update</md-icon>
              Mis à jour il y a 3 minutes
            </div>
          </template>
        </stats-card>
      </div>
      <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
        <stats-card data-background-color="secondary">
          <template  slot="header">
            <i class="fab fa-twitter"></i>
          </template>

          <template slot="content">
            <p class="category">Note Externe</p>
            <h3 class="title">4,41/5</h3>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>update</md-icon>
              Mis à jour il y a 3 minutes
            </div>
          </template>
        </stats-card>
      </div>

      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
        <chart-card
          :chart-data="dailySalesChart.data"
          :chart-options="dailySalesChart.options"
          :chart-type="'Bar'"
          data-background-color="blue">
          <template slot="content">
            <h4 class="title">Nombre de commandes</h4>
              <p class="category">
                <span class="text-success"><i class="fas fa-long-arrow-alt-up"></i> 55% </span> augmentation du nombre de commande ce mois
              </p>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>access_time</md-icon>
              mis à jour il y a 4 minutes
            </div>
          </template>
        </chart-card>
      </div>
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
        <chart-card
          :chart-data="nbReviewChart.data"
          :chart-options="nbReviewChart.options"
          :chart-type="'Bar'"
          data-background-color="orange">
          <template slot="content">
            <h4 class="title">Nombre d'avis Origami</h4>
              <p class="category">
                <span class="text-success"><i class="fas fa-long-arrow-alt-up"></i> 55% </span> augmentation du nombre d'avis Origami ce mois
              </p>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>access_time</md-icon>
              mis à jour il y a 4 minutes
            </div>
          </template>
        </chart-card>
      </div>
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
        <chart-card
          :chart-data="emailsSubscriptionChart.data"
          :chart-options="emailsSubscriptionChart.options"
          :chart-responsive-options="emailsSubscriptionChart.responsiveOptions"
          :chart-type="'Line'"
          data-background-color="primary">
          <template slot="content">
            <h4 class="title">Evolution de la note globale Origami</h4>
              <p class="category">
                Ne prends pas en compte les avis externes
              </p>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>access_time</md-icon>
              mis à jour il y a  10 minutes
            </div>
          </template>
        </chart-card>
      </div>
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
        <chart-card
          :chart-data="externalRatingChart.data"
          :chart-options="externalRatingChart.options"
          :chart-responsive-options="externalRatingChart.responsiveOptions"
          :chart-type="'Line'"
          data-background-color="secondary">
          <template slot="content">
            <h4 class="title">Evolution de la note externe</h4>
              <p class="category">
                Ne prends pas en compte les avis Origami
              </p>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>access_time</md-icon>
              mis à jour il y a  10 minutes
            </div>
          </template>
        </chart-card>
      </div>
      <!--<div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">-->
        <!--<chart-card-->
          <!--:chart-data="dataCompletedTasksChart.data"-->
          <!--:chart-options="dataCompletedTasksChart.options"-->
          <!--:chart-type="'Line'"-->
          <!--data-background-color="green">-->
          <!--<template slot="content">-->
            <!--<h4 class="title">Completed Tasks</h4>-->
              <!--<p class="category">-->
                <!--Last Campaign Performance-->
              <!--</p>-->
          <!--</template>-->

          <!--<template slot="footer">-->
            <!--<div class="stats">-->
              <!--<md-icon>access_time</md-icon>-->
              <!--campaign sent 26 minutes ago-->
            <!--</div>-->
          <!--</template>-->
        <!--</chart-card>-->
      <!--</div>-->
      <!--<div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">-->
        <!--<md-card>-->
          <!--<md-card-header data-background-color="orange">-->
            <!--<h4 class="title">Employees Stats</h4>-->
            <!--<p class="category">New employees on 15th September, 2016</p>-->
          <!--</md-card-header>-->
          <!--<md-card-content>-->
            <!--<ordered-table table-header-color="orange"></ordered-table>-->
          <!--</md-card-content>-->
        <!--</md-card>-->
      <!--</div>-->
      <!--<div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">-->
        <!--<nav-tabs-card>-->
          <!--<template slot="content">-->
            <!--<span class="md-nav-tabs-title">Tasks:</span>-->
            <!--<md-tabs md-sync-route class="md-success" md-alignment="left">-->

              <!--<md-tab id="tab-home" md-label="Bugs" md-icon="bug_report">-->
                <!--<nav-tabs-table></nav-tabs-table>-->
              <!--</md-tab>-->

              <!--<md-tab id="tab-pages" md-label="Website" md-icon="code">-->
                <!--<nav-tabs-table></nav-tabs-table>-->
              <!--</md-tab>-->

              <!--<md-tab id="tab-posts" md-label="server" md-icon="cloud">-->
                <!--<nav-tabs-table></nav-tabs-table>-->
              <!--</md-tab>-->
            <!--</md-tabs>-->
          <!--</template>-->
        <!--</nav-tabs-card>-->
      </div>
    </div>
  </div>
</template>

<script>
import {
  StatsCard,
  ChartCard,
  NavTabsCard,
  NavTabsTable,
  OrderedTable
} from '../components'

export default{
  components: {
    StatsCard,
    ChartCard,
    NavTabsCard,
  },
  data () {
    return {
      dailySalesChart: {
        data: {
          labels: ['Ja', 'Fe', 'Ma', 'Ap', 'Mai', 'Ju', 'Jul', 'Au', 'Se', 'Oc', 'No', 'De'],
          series: [
            [50, 70, 100, 150, 230, 280, 400, 520, 640, 770, 890, 1030]
          ]
        },
        options: {
          lineSmooth: this.$Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 1040, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 20
          }
        }
      },
      nbReviewChart: {
        data: {
          labels: ['Ja', 'Fe', 'Ma', 'Ap', 'Mai', 'Ju', 'Jul', 'Au', 'Se', 'Oc', 'No', 'De'],
          series: [
            [5, 7, 12, 18, 27, 32, 46, 57, 69, 82, 93, 119]
          ]
        },
        options: {
          lineSmooth: this.$Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 130, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 20
          }
        }
      },
      dataCompletedTasksChart: {
        data: {
          labels: ['Ja', 'Fe', 'Ma', 'Ap', 'Mai', 'Ju', 'Jul', 'Au', 'Se', 'Oc', 'No', 'De'],
          series: [
            [3.5, 4, 4.12, 4.26, 4.30, 4.45, 4.50, 4.45, 4.59, 4.61, 4.75, 4.81]
          ]
        },

        options: {
          lineSmooth: this.$Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          }
        }
      },
      emailsSubscriptionChart: {
        data: {
          labels: ['Ja', 'Fe', 'Ma', 'Ap', 'Mai', 'Ju', 'Jul', 'Au', 'Se', 'Oc', 'No', 'De'],
          series: [
            [3.5, 4, 4.12, 4.26, 4.30, 4.45, 4.50, 4.45, 4.59, 4.61, 4.75, 4.81]
          ]
        },
        options: {
          axisX: {
            showGrid: false
          },
          low: 3,
          high: 6,
          chartPadding: {
            top: 0,
            right: 5,
            bottom: 0,
            left: 0
          }
        },
        responsiveOptions: [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0]
              }
            }
          }]
        ]
      },
      externalRatingChart: {
        data: {
          labels: ['Ja', 'Fe', 'Ma', 'Ap', 'Mai', 'Ju', 'Jul', 'Au', 'Se', 'Oc', 'No', 'De'],
          series: [
            [3.3, 3.7, 4.03, 4.12, 4.23, 4.3, 4.47, 4.34, 4.41, 4.47, 4.54, 4.56]
          ]
        },
        options: {
          axisX: {
            showGrid: false
          },
          low: 3,
          high: 6,
          chartPadding: {
            top: 0,
            right: 5,
            bottom: 0,
            left: 0
          }
        },
        responsiveOptions: [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0]
              }
            }
          }]
        ]
      }
    }
  }
}
</script>
